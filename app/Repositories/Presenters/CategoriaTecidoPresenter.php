<?php

namespace Rossina\Repositories\Presenters;

use Rossina\Repositories\CategoriaTecidoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CategoriaTecidoPresenter
 *
 * @package namespace Rossina\Repositories/Presenters;
 */
class CategoriaTecidoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CategoriaTecidoTransformer();
    }
}
