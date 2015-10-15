<?php

namespace Rossina\Repositories\Presenters;

use Prettus\Repository\Presenter\FractalPresenter;
use Rossina\Repositories\FerramentaTransformer;

/**
 * Class FerramentaPresenter
 *
 * @package namespace Rossina\Repositories/Presenters;
 */
class FerramentaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new FerramentaTransformer();
    }
}
