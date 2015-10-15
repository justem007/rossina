<?php

namespace Rossina\Repositories\Presenters;

use Rossina\Repositories\ImageTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ImagePresenter
 *
 * @package namespace Rossina\Repositories/Presenters;
 */
class ImagePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ImageTransformer();
    }
}
