<?php

namespace Rossina\Repositories\Presenters;


use Prettus\Repository\Presenter\FractalPresenter;
use Rossina\Repositories\Transformers\BlocoUmTransformer;

/**
 * Class BlocoUmPresenter
 *
 * @package namespace Rossina\Repositories/Presenters;
 */
class BlocoUmPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BlocoUmTransformer();
    }
}
