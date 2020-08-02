<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GameCard extends Component
{
    public string $title;
    public string $genre;
    public string $imageUrl;
    public string $platforms;
    public float $rating = null;

    /**
     * Create GameCard Component Instance
     *
     * @param string $title
     * @param string $genre
     * @param string $platforms
     * @param string $imageUrl
     * @param float $rating
     */
    public function __construct(
        string $title, string $genre, string $platforms, string $imageUrl,
        float $rating  = null
    )
    {
        $this->title = $title;
        $this->genre = $genre;
        $this->rating = $rating;
        $this->platforms = $platforms;
        $this->imageUrl = $imageUrl;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.game-card');
    }
}
