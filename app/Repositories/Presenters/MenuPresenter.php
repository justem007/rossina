<?php

namespace Rossina\Repositories\Presenters;

use Rossina\Repositories\Transformers\MenuTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class MenuPresenter
 *
 * @package namespace Rossina\Repositories/Presenters;
 */
class MenuPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MenuTransformer();
    }
}
