<?php
namespace app\models;

use fastphp\base\Model;
use fastphp\db\Db;

/**
 * 用户Model
 */
class ItemModel extends Model
{
    /**
     * 自定义当前模型操作的数据库表名称，
     * 如果不指定，默认为类名称的小写字符串，
     * 这里就是 item 表
     * @var string
     */
    protected $table = 'item';

    /**
     * 搜索功能，因为 Sql 父类里面没有现成的 like 搜索，
     * 所以需要自己写 SQL 语句，对数据库的操作应该都放
     * 在 Model 里面，然后提供给 Controller 直接调用
     * @param string $keyword 查询的关键词
     * @return array 返回的数据
     */
    public function search($keyword)
    {
        try {
            // SQL 查询语句，安全地使用 prepare 和 bindValue
            $sql = sprintf("SELECT * FROM `%s` WHERE `item_name` LIKE :keyword", $this->table);

            // 准备 SQL 语句
            $sth = Db::pdo()->prepare($sql);

            // 绑定参数，使用 % 符号进行模糊搜索
            $sth->bindValue(':keyword', "%$keyword%", \PDO::PARAM_STR);

            // 执行查询
            $sth->execute();

            // 返回所有结果，使用关联数组
            return $sth->fetchAll(\PDO::FETCH_ASSOC);

        } catch (\PDOException $e) {
            // 错误处理，记录或抛出错误
            error_log('Database error: ' . $e->getMessage());
            return [];
        }
    }
}
