<?php

namespace Rossina\Repositories\Presenters;

use Prettus\Repository\Presenter\FractalPresenter;
use Rossina\Repositories\Transformers\BlocoUmDestaqueTransformer;

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
