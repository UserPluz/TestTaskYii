<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%post}}`.
 */
class m200917_074737_add_active_column_to_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */


    public function up()
    {
        $this->addColumn('post', 'active', $this->boolean());
    }

    public function down()
    {
        $this->dropColumn('post', 'active');
    }
    // public function safeUp()
    // {
    // }

    // /**
    //  * {@inheritdoc}
    //  */
    // public function safeDown()
    // {
    // }
}
