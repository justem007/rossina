<?php

namespace Rossina\Repositories\Presenters;

use Prettus\Repository\Presenter\FractalPresenter;
use Rossina\Repositories\BlocoDoisTransformer;

/**
 * Class BlocoDoisPresenter
 *
 * @package namespace Rossina\Repositories/Presenters;
 */
class BlocoDoisPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BlocoDoisTransformer();
    }
}
