<?php

namespace Rossina\Repositories\Presenters;

use Rossina\Repositories\Transformers\CorTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CorPresenter
 *
 * @package namespace Rossina\Repositories/Presenters;
 */
class CorPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CorTransformer();
    }
}
