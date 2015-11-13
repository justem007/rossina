<?php

namespace Rossina\Repositories\Presenters;

use Rossina\Repositories\FaqTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class FaqPresenter
 *
 * @package namespace Rossina\Repositories/Presenters;
 */
class FaqPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new FaqTransformer();
    }
}
