@push('title', 'Just Chat AI')
<div class="bg-[rgba(11,21,34,255)] min-h-screen flex flex-col justify-center items-center">

    <div class="flex flex-col">
        <p class="text-4xl text-center font-bold mt-5">Just Chat AI</p>
        <form wire:submit.prevent="getResponse" class="flex flex-col gap-2 mt-5">
            <textarea id="autoResizeTextarea" wire:model='question' class="textarea textarea-bordered w-[20rem] md:w-[40rem] resize-none"
                placeholder="Your question..."></textarea>
                <select wire:model='aiModel' class="select select-ghost w-full">
                    <option selected value="GA">Groq AI</option>
                    <option value="GM">Gemini</option>
                  </select>
            <button id="submitButton" wire:submit='getResponse' wire:loading.attr="disabled" class="btn btn-neutral">
                <span wire:loading.remove wire:target="getResponse">Submit</span>
                <span wire:loading wire:target="getResponse" class="loading loading-spinner"></span>
            </button>
        </form>

        @if ($response)
            <div class="bg-[rgba(10,15,25,255)] h-fit w-[20rem] md:w-[40rem] mt-4 mb-5 rounded-md animate-fadeIn">
                <pre><code class="language-swift">
                    <p class="p-3 font-white font-sans text-wrap">{!! $response !!}</p>
                </code></pre>
            </div>
        @endif
    </div>


    <footer class="footer footer-center p-4 text-base-content">
        <aside>
            <p>Just Chat AI by Kepodev, Powered by Groq AI</p>
        </aside>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function adjustHeight(el) {
                el.style.height = 'auto';
                el.style.height = (el.scrollHeight) + 'px';
            }

            function toggleSubmitButton() {
                const textarea = document.getElementById('autoResizeTextarea');
                const submitButton = document.getElementById('submitButton');
                submitButton.disabled = textarea.value.trim() === '';
            }

            const textarea = document.getElementById('autoResizeTextarea');
            const submitButton = document.getElementById('submitButton');

            if (textarea && submitButton) {
                adjustHeight(textarea);
                toggleSubmitButton();

                textarea.addEventListener('input', function() {
                    adjustHeight(this);
                    toggleSubmitButton();
                });

                Livewire.hook('message.processed', (message, component) => {
                    adjustHeight(textarea);
                    toggleSubmitButton();
                });
            }
        });
    </script>
</div>
