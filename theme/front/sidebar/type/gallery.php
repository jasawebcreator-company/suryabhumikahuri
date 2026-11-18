<?php if($opsi == 'gallery'): ?>
	

			<style>
				#villas-gallery-section {
					background-color: white;
    
    .container-global {
        display: flex;
        flex-direction: column;
        gap: 3rem;
    }
    
    .gallery-header {
        text-align: center;
        
        .section-title {
            font-family: var(--primtext);
            font-size: 2.2rem;
            font-weight: 500;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }
        
        .section-subtitle {
            font-family: var(--subtext);
            font-size: 0.95rem;
            color: var(--text-muted-dark);
            max-width: 600px;
            margin-inline: auto;
            line-height: 1.6;
        }
    }
}

.masonry-grid {
    column-count: 1;
    column-gap: .5rem;
    width: 100%;
    
    @media (min-width: 576px) {
        column-count: 3;
    }
    
    @media (min-width: 992px) {
        column-count: 4;
    }
}

.masonry-item {
    break-inside: avoid;
    margin-bottom: 1.5rem;
    border-radius: 16px;
    overflow: hidden;
    cursor: pointer;
    box-shadow: 0 8px 25px rgba(24, 33, 39, 0.03);
    border: 1px solid rgba(24, 33, 39, 0.04);
    transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    background-color: #ffffff;
    
    img {
        width: 100%;
        height: auto;
        display: block;
        transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
    }
    
    &:hover {
        transform: translateY(-6px);
        box-shadow: 0 18px 35px rgba(24, 33, 39, 0.08);
        
        img {
            transform: scale(1.03);
        }
    }
}
			</style>




        <section id="villas-gallery-section">
            <div class="container-global">
                <div class="content">                    
                    <!-- Masonry Grid -->
                    <div class="masonry-grid">

												<?php foreach ($data->data as $key => $item): ?>
	                        <div class="masonry-item gallery-item">
	                            <img src="<?= $item->url_img ?>" alt="gallery" />
	                        </div>
										    <?php endforeach; ?> 
                    </div>
                </div>
            </div>
        </section>
<?php endif; ?>