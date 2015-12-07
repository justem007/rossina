<?php

namespace Rossina\Repositories\Presenters;

use Rossina\Repositories\Transformers\BlocoTecidoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class BlocoTecidoPresenter
 *
 * @package namespace Rossina\Repositories/Presenters;
 */
class BlocoTecidoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BlocoTecidoTransformer();
    }
}
