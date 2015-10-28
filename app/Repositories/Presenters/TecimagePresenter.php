<?php

namespace Rossina\Repositories\Presenters;

use Prettus\Repository\Presenter\FractalPresenter;
use Rossina\Repositories\TecimageTransformer;

/**
 * Class TecimagePresenter
 *
 * @package namespace Rossina\Repositories/Presenters;
 */
class TecimagePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TecimageTransformer();
    }
}
