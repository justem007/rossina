<?php

namespace Rossina\Repositories\Presenters;


use Prettus\Repository\Presenter\FractalPresenter;
use Rossina\Repositories\Transformers\PostTransformer;

/**
 * Class PostPresenter
 *
 * @package namespace Rossina\Repositories/Presenters;
 */
class PostPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PostTransformer();
    }
}
