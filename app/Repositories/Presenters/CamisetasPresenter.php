<?php

namespace Rossina\Repositories\Presenters;

use Rossina\Repositories\Transformers\CamisetasTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CamisetasPresenter
 *
 * @package namespace Rossina\Repositories/Presenters;
 */
class CamisetasPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CamisetasTransformer();
    }
}
