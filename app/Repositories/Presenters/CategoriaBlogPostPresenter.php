<?php

namespace Rossina\Repositories\Presenters;

use Rossina\Repositories\CategoriaBlogPostTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CategoriaBlogPostPresenter
 *
 * @package namespace Rossina\Repositories/Presenters;
 */
class CategoriaBlogPostPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CategoriaBlogPostTransformer();
    }
}
