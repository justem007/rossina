<?php

namespace Rossina\Repositories\Presenters;

use Rossina\Repositories\EtiquetaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class EtiquetaPresenter
 *
 * @package namespace Rossina\Repositories/Presenters;
 */
class EtiquetaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new EtiquetaTransformer();
    }
}
