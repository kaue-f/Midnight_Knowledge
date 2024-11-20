<article class="flex flex-col w-1/5 gap-4 justify-center items-center">
    <a href="/" wire:navigate class="-mt-40">
        <img src="{{ asset('images/layouts/Logo2.png') }}" style="height: 10rem;">
    </a>

    <div x-data="{ open: false }" class="w-full rounded-lg bg-base-100/45 p-8 shadow-lg shadow-black/10">
        <div class="flex justify-center space-x-10 pb-3">
            <p x-on:click="open = false" class="text-center text-lg cursor-pointer self-center"
                :class="{ 'border-b-2 border-primary font-semibold text-primary': !open }">
                Login
            </p>
            <p x-on:click="open = true" class="text-center cursor-pointer text-lg self-center"
                :class="{ 'border-b-2 border-primary font-semibold text-primary': open }">
                Registre-se
            </p>
        </div>
        <div :class="{ 'hidden': open }" class="w-full">
            <livewire:components.login />
        </div>
        <div :class="{ 'hidden': !open }" class="w-full">
            <livewire:components.registre>
        </div>
    </div>
</article>
