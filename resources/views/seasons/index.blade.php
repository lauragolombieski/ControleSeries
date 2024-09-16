<x-layout title="{!!$series->name!!}">

    <div class="d-flex justify-center">
        <img src="{{ asset('storage/' . $series->cover)}}"
        style="height: 200px" 
        alt="Capa da Série" 
        class="image-fluid">
    </div>

        <form action="{{ route('seasons.destroy', ['serie' => $series->id]) }}" method="POST">
            @csrf
            <button type="submit" id="deleteimage">
                Remover Capa
            </button>
        </form>
    <br>

    <div class="centralizar">
            <label for="temp">Temporada</label>
            <select id="temp" name="temp">
                @foreach ($seasons as $season)
                    <option value="{{ $season->number }}" {{ $season->number == 1 ? 'selected' : '' }}> 
                        {{ $season->number }} 
                    </option>
                @endforeach
            </select>

            <br><br>
            
            <div class="carrossel">
                <div class="slides">
                    <!-- Episódios serão carregados aqui via AJAX -->
                </div>
            </div>
            
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    // Carrega automaticamente a temporada 1 ao entrar na página
                    loadEpisodes(1);
                });
            
                document.getElementById('temp').addEventListener('change', function() {
                    var seasonNumber = this.value;
                    loadEpisodes(seasonNumber);
                });
            
                function loadEpisodes(seasonNumber) {
                    var seriesId = {{ $series->id }};  // Pega o ID da série
            
                    // Faz a chamada AJAX para buscar os episódios da temporada
                    fetch(`/series/${seriesId}/seasons/${seasonNumber}/episodes`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Erro ao buscar episódios');
                            }
                            return response.json();
                        })
                        .then(data => {
                            const slides = document.querySelector('.slides');
                            slides.innerHTML = '';  // Limpa os episódios anteriores
            
                            data.episodes.forEach(episode => {
                                const episodeDiv = document.createElement('div');
                                episodeDiv.classList.add('episode-item');
                                episodeDiv.innerHTML = `
                                    <img src="{{ asset('storage/' . $series->cover)}}" style="height: 100px" alt="Capa da Série" class="image-fluid">
                                    <p id="episodios"> Episódio ${episode.number}</p>
                                `;
                                slides.appendChild(episodeDiv);
                            });
                        })
                        .catch(error => {
                            console.error('Erro ao buscar episódios:', error);
                        });
                }
            </script>
            
    
        <!-- Botões de navegação -->
        <button class="prev" onclick="plusSlides(-1)">&#10094;</button>
        <button class="next" onclick="plusSlides(1)">&#10095;</button>
    </div>

    <script>
        let slideIndex = 0;

    function showSlides(index) {
    const slides = document.querySelector('.slides');
    const totalSlides = (document.querySelectorAll('.episode-item').length)/3;

    if (index >= totalSlides) {
        slideIndex = 0;
    } else if (index < 0) {
        slideIndex = totalSlides - 1;
    }

    slides.style.transform = `translateX(${-slideIndex * 100}%)`;
}

    function plusSlides(n) {
        slideIndex += n;
        showSlides(slideIndex);
    }

    // Exibir o slide inicial
    showSlides(slideIndex);




</script>
        
</x-layout>