<x-filament-panels::page>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-8">
        <form wire:submit.prevent="saveHomeSeo">
            {{ $this->homeForm }}
        </form>

        <form wire:submit.prevent="saveSlotsSeo">
            {{ $this->slotsForm }}
        </form>

        <form wire:submit.prevent="saveLivesSeo">
            {{ $this->livesForm }}
        </form>

        <form wire:submit.prevent="saveFishingsSeo">
            {{ $this->fishingsForm }}
        </form>

        <form wire:submit.prevent="saveSportsSeo">
            {{ $this->sportsForm }}
        </form>

        <form wire:submit.prevent="saveTablesSeo">
            {{ $this->tablesForm }}
        </form>

        <form wire:submit.prevent="saveArcadesSeo">
            {{ $this->arcadesForm }}
        </form>

        <form wire:submit.prevent="saveEsportSeo">
            {{ $this->esportForm }}
        </form>

        <form wire:submit.prevent="savePromotionsSeo">
            {{ $this->promotionsForm }}
        </form>

        <form wire:submit.prevent="saveBlogsSeo">
            {{ $this->blogsForm }}
        </form>

        <form wire:submit.prevent="saveFaqsSeo">
            {{ $this->faqsForm }}
        </form>

        <form wire:submit.prevent="saveAnnouncementsSeo">
            {{ $this->announcementsForm }}
        </form>

        <form wire:submit.prevent="saveGaming21Seo">
            {{ $this->gaming21Form }}
        </form>

        <form wire:submit.prevent="saveResponsibleGamingSeo">
            {{ $this->responsibleGamingForm }}
        </form>
    </div>

</x-filament-panels::page>
