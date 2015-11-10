<?php

namespace Rossina\Repositories\Presenters;

use Rossina\Repositories\Transformers\CategoriaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CategoriaPresenter
 *
 * @package namespace Rossina\Repositories/Presenters;
 */
class CategoriaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CategoriaTransformer();
    }
}
