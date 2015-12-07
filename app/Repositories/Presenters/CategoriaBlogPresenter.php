<?php

namespace Rossina\Repositories\Presenters;

use Rossina\Repositories\CategoriaBlogTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CategoriaBlogPresenter
 *
 * @package namespace Rossina\Repositories/Presenters;
 */
class CategoriaBlogPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CategoriaBlogTransformer();
    }
}
