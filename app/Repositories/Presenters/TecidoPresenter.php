<?php

namespace Rossina\Repositories\Presenters;

use Rossina\Repositories\Transformers\TecidoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TecidoPresenter
 *
 * @package namespace Rossina\Repositories/Presenters;
 */
class TecidoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TecidoTransformer();
    }
}
