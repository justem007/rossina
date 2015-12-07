<?php

namespace Rossina\Repositories\Presenters;


use Prettus\Repository\Presenter\FractalPresenter;
use Rossina\Repositories\Transformers\BlocoCamisetaTransformer;

/**
 * Class BlocoCamisetaPresenter
 *
 * @package namespace Rossina\Repositories/Presenters;
 */
class BlocoCamisetaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BlocoCamisetaTransformer();
    }
}
