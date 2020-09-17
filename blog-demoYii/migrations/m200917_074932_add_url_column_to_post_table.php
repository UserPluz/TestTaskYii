<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%post}}`.
 */
class m200917_074932_add_url_column_to_post_table extends Migration
{
    /**s
     * {@inheritdoc}
     */
    public function up()
    {
        $this->addColumn('post', 'url', $this->string()->unique());
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropColumn('post', 'url');
    }
}
