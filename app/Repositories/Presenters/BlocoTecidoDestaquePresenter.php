<?php

namespace Rossina\Repositories\Presenters;

use Rossina\Repositories\Transformers\BlocoTecidoDestaqueTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class BlocoTecidoDestaquePresenter
 *
 * @package namespace Rossina\Repositories/Presenters;
 */
class BlocoTecidoDestaquePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BlocoTecidoDestaqueTransformer();
    }
}
