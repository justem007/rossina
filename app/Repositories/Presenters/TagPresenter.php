<?php

namespace Rossina\Repositories\Presenters;

use Rossina\Repositories\Transformers\TagTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TagPresenter
 *
 * @package namespace Rossina\Repositories/Presenters;
 */
class TagPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TagTransformer();
    }
}
