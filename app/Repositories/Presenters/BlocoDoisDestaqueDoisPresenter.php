<?php

namespace Rossina\Repositories\Presenters;


use Prettus\Repository\Presenter\FractalPresenter;
use Rossina\Repositories\Transformers\BlocoDoisDestaqueDoisTransformer;

/**
 * Class BlocoDoisDestaqueDoisPresenter
 *
 * @package namespace Rossina\Repositories/Presenters;
 */
class BlocoDoisDestaqueDoisPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BlocoDoisDestaqueDoisTransformer();
    }
}
