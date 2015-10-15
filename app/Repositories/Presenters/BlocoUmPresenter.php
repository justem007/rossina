<?php

namespace Rossina\Repositories\Presenters;

use Rossina\Repositories\BlocoUmTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

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
