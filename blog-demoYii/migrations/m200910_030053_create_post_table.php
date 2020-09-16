<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `{{%posts}}`.
 */
class m200910_030053_create_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */

    public function up()
    {
        $this->createTable('post',
        [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'content' => $this->text(),
            'date' => $this->date(),
            'active' => $this->boolean()
        ]);

        Yii::$app->db->createCommand()->batchInsert('post', ['name','content','date','active'], [
            ['Новость 1','Содержание 1','2020-09-01','0'],
            ['Новость 2','Содержание 2','2020-09-02','0'],
            ['Новость 3','Содержание 3','2020-09-03','0'],
            ['Новость 4','Содержание 4','2020-09-04','1'],
            ['Новость 5','Содержание 5','2020-09-05','1'],
            ['Новость 6','Содержание 6','2020-09-06','1'],
            ['Новость 7','Содержание 7','2020-09-07','1'],
            ['Новость 8','Содержание 8','2020-09-08','1'],
            ['Новость 9','Содержание 9','2020-09-09','1'],
        ])->execute();
    }

    public function down()
    {
        $this->dropTable('post');
    }
    // public function safeUp()
    // {
    //     $this->createTable('{{%post}}', [
    //         'id' => $this->primaryKey(),
    //     ]);
    // }

    // /**
    //  * {@inheritdoc}
    //  */
    // public function safeDown()
    // {
    //     $this->dropTable('{{%post}}');
    // }
}
