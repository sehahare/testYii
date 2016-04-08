<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "books".
 *
 * @property integer $id
 * @property string $title
 * @property string $author
 * @property string $summary
 * @property string $published_in
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['summary'], 'string'],
            [['title', 'author'], 'string', 'max' => 50],
            [['published_in'], 'string', 'max' => 124],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'author' => 'Author',
            'summary' => 'Summary',
            'published_in' => 'Published In',
        ];
    }
}
