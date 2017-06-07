<?php

/**
 * Created by PhpStorm.
 * User: pawelklecha
 * Date: 07/06/2017
 * Time: 23:37
 */
class BookView
{
    private $book;
    private $template;

    public function __construct(Book $book)
    {
        $this->book = $book;
        $this->template = <<<HTML
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">%TITLE%</h3>
                </div>
                <div class="panel-body">
                    <p><strong>ID:</strong> %ID%</p>
                    <p><strong>Author:</strong> %AUTHOR%</p>
                    <p><strong>Description:</strong> %DESCRIPTION%</p>
                    <p><strong>ISBN:</strong> %ISBN%</p>
                </div>
            </div>
HTML;

    }

    public function renderTemplate()
    {
        str_replace('%ID%', $this->book->getId(), $this->template);
        str_replace('%TITLE%', $this->book->getTitle(), $this->template);
        str_replace('%AUTHOR%', $this->book->getAuthor(), $this->template);
        str_replace('%DESCRIPTION%', $this->book->getDescription(), $this->template);
        str_replace('%ISBN%', $this->book->getIsbn(), $this->template);

        return $this->template;

    }
}