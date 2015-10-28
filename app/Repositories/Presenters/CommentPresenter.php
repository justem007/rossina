<?php

namespace Rossina\Repositories\Presenters;


use Prettus\Repository\Presenter\FractalPresenter;
use Rossina\Repositories\Transformers\CommentTransformer;

/**
 * Class CommentPresenter
 *
 * @package namespace Rossina\Repositories/Presenters;
 */
class CommentPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CommentTransformer();
    }
}
