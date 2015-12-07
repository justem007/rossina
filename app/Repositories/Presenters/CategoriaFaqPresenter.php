<?php

namespace Rossina\Repositories\Presenters;

use Rossina\Repositories\CategoriaFaqTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CategoriaFaqPresenter
 *
 * @package namespace Rossina\Repositories/Presenters;
 */
class CategoriaFaqPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CategoriaFaqTransformer();
    }
}
