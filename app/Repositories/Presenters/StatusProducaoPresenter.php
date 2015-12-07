<?php

namespace Rossina\Repositories\Presenters;

use Rossina\Repositories\StatusProducaoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class StatusProducaoPresenter
 *
 * @package namespace Rossina\Repositories/Presenters;
 */
class StatusProducaoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new StatusProducaoTransformer();
    }
}
