<?php

namespace Rossina\Repositories\Presenters;

use Prettus\Repository\Presenter\FractalPresenter;
use Rossina\Repositories\Transformers\ImageTransformer;

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
