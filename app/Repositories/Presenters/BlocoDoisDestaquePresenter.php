<?php

namespace Rossina\Repositories\Presenters;

use Prettus\Repository\Presenter\FractalPresenter;
use Rossina\Repositories\Transformers\BlocoDoisDestaqueTransformer;

/**
 * Class BlocoDoisDestaquePresenter
 *
 * @package namespace Rossina\Repositories/Presenters;
 */
class BlocoDoisDestaquePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BlocoDoisDestaqueTransformer();
    }
}
