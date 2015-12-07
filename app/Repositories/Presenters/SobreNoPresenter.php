<?php

namespace Rossina\Repositories\Presenters;

use Rossina\Repositories\SobreNoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SobreNoPresenter
 *
 * @package namespace Rossina\Repositories/Presenters;
 */
class SobreNoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new SobreNoTransformer();
    }
}
