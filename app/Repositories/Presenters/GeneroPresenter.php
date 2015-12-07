<?php

namespace Rossina\Repositories\Presenters;

use Rossina\Repositories\Transformers\GeneroTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class GeneroPresenter
 *
 * @package namespace Rossina\Repositories/Presenters;
 */
class GeneroPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new GeneroTransformer();
    }
}
