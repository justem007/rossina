<?php

namespace Rossina\Repositories\Presenters;

use Prettus\Repository\Presenter\FractalPresenter;
use Rossina\Repositories\Transformers\TecidoAmostraTransformer;

/**
 * Class TecidoAmostraPresenter
 *
 * @package namespace Rossina\Repositories/Presenters;
 */
class TecidoAmostraPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TecidoAmostraTransformer();
    }
}
