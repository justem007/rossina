<?php

namespace Rossina\Repositories\Presenters;

use Rossina\Repositories\Transformers\SilkTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SilkPresenter
 *
 * @package namespace Rossina\Repositories/Presenters;
 */
class SilkPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new SilkTransformer();
    }
}
