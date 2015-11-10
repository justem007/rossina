<?php

namespace Rossina\Repositories\Presenters;

use Rossina\Repositories\Transformers\BlocoDoisDestaqueUmTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class BlocoDoisDestaqueUmPresenter
 *
 * @package namespace Rossina\Repositories/Presenters;
 */
class BlocoDoisDestaqueUmPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BlocoDoisDestaqueUmTransformer();
    }
}
