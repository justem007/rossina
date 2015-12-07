<?php

namespace Rossina\Repositories\Presenters;

use Rossina\Repositories\Transformers\HorarioTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class HorarioPresenter
 *
 * @package namespace Rossina\Repositories/Presenters;
 */
class HorarioPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new HorarioTransformer();
    }
}
