<?php

namespace Rossina\Repositories\Presenters;

use Rossina\Repositories\BlocoUmDestaqueTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class BlocoUmDestaquePresenter
 *
 * @package namespace Rossina\Repositories/Presenters;
 */
class BlocoUmDestaquePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BlocoUmDestaqueTransformer();
    }
}
