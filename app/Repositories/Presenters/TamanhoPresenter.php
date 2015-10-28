<?php

namespace Rossina\Repositories\Presenters;

use Rossina\Repositories\Transformers\TamanhoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TamanhoPresenter
 *
 * @package namespace Rossina\Repositories/Presenters;
 */
class TamanhoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TamanhoTransformer();
    }
}
