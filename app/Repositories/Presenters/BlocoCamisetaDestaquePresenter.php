<?php

namespace Rossina\Repositories\Presenters;

use Prettus\Repository\Presenter\FractalPresenter;
use Rossina\Repositories\Transformers\BlocoCamisetaDestaqueTransformer;

/**
 * Class BlocoCamisetaDestaquePresenter
 *
 * @package namespace Rossina\Repositories/Presenters;
 */
class BlocoCamisetaDestaquePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BlocoCamisetaDestaqueTransformer();
    }
}
