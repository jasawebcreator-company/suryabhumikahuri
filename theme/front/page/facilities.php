<style>
	#facilities-intro {
    padding-block: var(--section-padding);
    background-color: #ffffff;
    color: var(--text-dark);
    border-bottom: 1px solid rgba(24, 33, 39, 0.05);
    
    .content {
        display: flex;
        flex-direction: column;
        gap: 2.5rem;
    }
    
    .intro-main-col {
        width: 100%;
        
        .intro-title {
            font-family: var(--primtext);
            font-size: 2.2rem;
            font-weight: 500;
            color: var(--text-dark);
            margin-bottom: 1.25rem;
            line-height: 1.25;
        }
        
        .intro-text {
            font-family: var(--subtext);
            font-size: 1.05rem;
            color: var(--text-muted-dark);
            line-height: 1.8;
            margin-bottom: 0;
        }
    }
    
    .intro-concept-col {
        width: 100%;
        background-color: #f4f2ed;
        border-radius: 16px;
        padding: 2.25rem;
        border-left: 3px solid var(--color-gold);
        
        .concept-subtitle {
            font-family: var(--primtext);
            font-size: 1.5rem;
            font-weight: 500;
            color: var(--text-dark);
            margin-bottom: 0.75rem;
            line-height: 1.3;
        }
        
        .concept-text {
            font-family: var(--subtext);
            font-size: 0.95rem;
            color: var(--text-muted-dark);
            line-height: 1.7;
            margin-bottom: 0;
        }
    }
    
    /* Desktop layout overrides */
    @media (min-width: 768px) {
        .content {
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            gap: 5%;
        }
        
        .intro-main-col {
            width: 52%;
            
            .intro-title {
                font-size: 2.8rem;
            }
        }
        
        .intro-concept-col {
            width: 43%;
            padding: 2.75rem;
        }
    }
}

/* ==========================================================================
   FACILITIES ALTERNATING LIST STYLING
   ========================================================================== */
#facilities-list-section {
    padding-block: var(--section-padding);
    background-color: var(--bg-light);
    color: var(--text-dark);
    
    .content {
        display: flex;
        flex-direction: column;
        gap: 5rem;
    }
    
    .facility-row {
        display: flex;
        flex-direction: column;
        gap: 2rem;
        
        &:hover {
            .facility-image-wrapper img {
                transform: scale(1.03);
            }
            
            .facility-title {
                color: var(--color-gold);
            }
        }
    }
    
    .facility-image-col {
        width: 100%;
        
        .facility-image-wrapper {
            width: 100%;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(24, 33, 39, 0.06);
            border: 1px solid rgba(24, 33, 39, 0.04);
            
            img {
                width: 100%;
                height: auto;
                display: block;
                transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
            }
        }
    }
    
    .facility-text-col {
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        
        .facility-tag {
            font-family: var(--subtext);
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            color: var(--color-gold);
            letter-spacing: 0.08em;
            margin-bottom: 0.75rem;
        }
        
        .facility-title {
            font-family: var(--primtext);
            font-size: 1.8rem;
            font-weight: 500;
            color: var(--text-dark);
            margin-bottom: 1.25rem;
            line-height: 1.3;
            transition: color 0.3s ease;
        }
        
        .facility-desc {
            font-family: var(--subtext);
            font-size: 0.95rem;
            color: var(--text-muted-dark);
            line-height: 1.75;
            margin-bottom: 0;
        }
    }
    
    /* Desktop layout overrides */
    @media (min-width: 768px) {
        .facility-row {
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            gap: 6%;
            
            /* Alternating items */
            &:nth-child(even) {
                flex-direction: row-reverse;
            }
        }
        
        .facility-image-col {
            width: 48%;
        }
        
        .facility-text-col {
            width: 46%;
            
            .facility-title {
                font-size: 2.4rem;
            }
        }
    }
}
</style>


        <section id="facilities-intro">
            <div class="container-global">
                <div class="content">
                    <!-- Left: Main Paragraph -->
                    <div class="intro-main-col">
                        <h2 class="intro-title">Designed for a Life Closer to Nature</h2>
                        <p class="intro-text">
                            Drago Wijaya Estate is planned as more than a collection of private villas. The estate brings together residential living, green landscapes, outdoor activities, and agricultural elements within the peaceful surroundings of Selemadeg Barat. With generous space dedicated to shared facilities and natural areas, residents can enjoy a calmer lifestyle connected to the land and the character of West Bali.
                        </p>
                    </div>
                    
                    <!-- Right: Highlighted Box -->
                    <div class="intro-concept-col">
                        <h3 class="concept-subtitle">A Balanced Estate Concept</h3>
                        <p class="concept-text">
                            Approximately 60% of the estate is planned for facilities, landscaping, and shared natural spaces. This approach creates a more open residential environment where private homes are surrounded by greenery, outdoor areas, and nature-led features rather than dense development.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Alternating Facilities List Grid -->
        <section id="facilities-list-section">
            <div class="container-global">
                <div class="content">

					<?php if (!empty($data->addon_contents)): ?>
						<?php foreach($data->addon_contents as $key => $items): ?>
		                    <div class="facility-row">
		                        <div class="facility-image-col">
									
		                            <div class="facility-image-wrapper">
		                                <img src="<?= $items->img_cover_url ?>" alt="Cycling experience through Balinese hills" />
		                            </div>
		                        </div>
		                        <div class="facility-text-col">
		                            <span class="facility-tag">Active Life</span>
		                            <h2 class="facility-title"><?= $items->name ?></h2>
		                            <p class="facility-desc">
		                                Explore the beauty of Bali on two wheels with our Cycling Experience at Drago Wijaya. Ride through scenic surroundings, discover local culture, and enjoy the refreshing tropical atmosphere while taking in the charm of the island at a relaxed pace. Suitable for all fitness levels, this activity offers a fun and eco-friendly way to experience the natural beauty and outdoor lifestyle of Bali during your stay.
		                            </p>
		                        </div>
		                    </div>
						<?php endforeach; ?>
					<?php endif; ?>
                    
                </div>
            </div>
        </section>