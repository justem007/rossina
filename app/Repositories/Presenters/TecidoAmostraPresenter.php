<?php

namespace Rossina\Repositories\Presenters;

use Rossina\Repositories\TecidoAmostraTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

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
