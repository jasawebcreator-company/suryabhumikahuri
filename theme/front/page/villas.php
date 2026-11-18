<style>
#villas-layout {
    padding-block: var(--section-padding);
    background-color: #ffffff;
    color: var(--text-dark);
}

.villas-main-container {
    display: flex;
    flex-direction: column;
    gap: 3.5rem;
}

/* Left Column: Villa Detail content */
.villa-detail-content {
    width: 100%;
    
    .villa-image-wrapper {
        width: 100%;
        border-radius: 16px;
        overflow: hidden;
        margin-bottom: 2rem;
        box-shadow: 0 15px 35px rgba(24, 33, 39, 0.06);
        border: 1px solid rgba(24, 33, 39, 0.04);
        
        img {
            width: 100%;
            height: auto;
            display: block;
        }
    }
    
    .villa-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-bottom: 1rem;
        
        .tag-badge {
            font-family: var(--subtext);
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 0.35rem 0.85rem;
            border-radius: 4px;
            
            &.tag-primary {
                background-color: #f4f2ed;
                color: var(--color-gold);
            }
            
            &.tag-secondary {
                background-color: rgba(24, 33, 39, 0.05);
                color: var(--bg-dark);
            }
        }
    }
    
    .villa-main-title {
        font-family: var(--primtext);
        font-size: 2.2rem;
        font-weight: 500;
        color: var(--text-dark);
        line-height: 1.25;
        margin-bottom: 0.5rem;
    }
    
    .villa-price {
        font-family: var(--primtext);
        font-size: 1.8rem;
        font-weight: 600;
        color: var(--color-gold);
        margin-bottom: 2rem;
    }
    
    /* Specifications Row styling */
    .villa-specs-row {
        display: flex;
        flex-wrap: wrap;
        gap: 1.5rem;
        padding-bottom: 2rem;
        border-bottom: 1px solid rgba(24, 33, 39, 0.06);
        margin-bottom: 2.5rem;
        width: 100%;
    }
    
    .spec-item {
        background-color: var(--bg-light);
        border: 1px solid rgba(24, 33, 39, 0.04);
        border-radius: 12px;
        padding: 1.25rem 1.5rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        flex-grow: 1;
        min-width: 180px;
        
        .spec-icon-wrapper {
            color: var(--color-gold);
            display: flex;
            align-items: center;
            justify-content: center;
            
            svg {
                width: 24px;
                height: 24px;
            }
        }
        
        .spec-info {
            display: flex;
            flex-direction: column;
            
            .spec-label {
                font-family: var(--subtext);
                font-size: 0.75rem;
                color: var(--text-muted-dark);
                text-transform: uppercase;
                letter-spacing: 0.05em;
                margin-bottom: 0.2rem;
            }
            
            .spec-value {
                font-family: var(--primtext);
                font-size: 1.1rem;
                font-weight: 500;
                color: var(--text-dark);
                line-height: 1.2;
            }
        }
    }
    
    .villa-description {
		strong {
			color: var(--color-gold);
		}
        .desc-title {
            font-family: var(--primtext);
            font-size: 1.6rem;
            font-weight: 500;
            color: var(--text-dark);
            margin-bottom: 1.25rem;
            position: relative;
            padding-bottom: 0.5rem;
            
            &::after {
                content: '';
                position: absolute;
                left: 0;
                bottom: 0;
                width: 40px;
                height: 2px;
                background-color: var(--color-gold);
            }
        }
        
        p {
            font-family: var(--subtext);
            font-size: 1rem;
            color: var(--text-muted-dark);
            line-height: 1.8;
            margin-bottom: 1.75rem;
        }
    }
}

/* Right Column: Sidebar styling */
.villa-sidebar {
    width: 100%;
    
    .villa-sidebar-widget {
        background-color: #ffffff;
        border: 1px solid rgba(24, 33, 39, 0.06);
        border-radius: 16px;
        padding: 2.5rem 2rem;
        box-shadow: 0 15px 35px rgba(24, 33, 39, 0.02);
        display: flex;
        flex-direction: column;
        
        .widget-promo-title {
            font-family: var(--primtext);
            font-size: 1.45rem;
            font-weight: 500;
            color: var(--text-dark);
            margin-bottom: 1rem;
            line-height: 1.35;
            padding-bottom: 0.75rem;
            border-bottom: 1px solid rgba(24, 33, 39, 0.06);
            position: relative;
            
            &::after {
                content: '';
                position: absolute;
                left: 0;
                bottom: -1px;
                width: 30px;
                height: 2px;
                background-color: var(--color-gold);
            }
        }
        
        .widget-promo-text {
            font-family: var(--subtext);
            font-size: 0.9rem;
            color: var(--text-muted-dark);
            line-height: 1.6;
            margin-bottom: 1.75rem;
        }
        
        .agent-info-card {
            background-color: var(--bg-light);
            border: 1px solid rgba(24, 33, 39, 0.04);
            border-radius: 12px;
            padding: 1.25rem;
            margin-bottom: 1.25rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            
            .agent-avatar {
                width: 44px;
                height: 44px;
                border-radius: 50%;
                background-color: var(--color-gold);
                color: var(--text-light);
                display: flex;
                align-items: center;
                justify-content: center;
                font-family: var(--primtext);
                font-size: 1.1rem;
                font-weight: bold;
                box-shadow: 0 4px 10px rgba(196, 162, 117, 0.2);
            }
            
            .agent-details {
                display: flex;
                flex-direction: column;
                
                .agent-name {
                    font-family: var(--subtext);
                    font-size: 0.9rem;
                    font-weight: 600;
                    color: var(--text-dark);
                    margin-bottom: 0.1rem;
                }
                
                .agent-label {
                    font-family: var(--subtext);
                    font-size: 0.75rem;
                    color: var(--text-muted-dark);
                }
            }
        }
        
        .sidebar-actions {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            
            .btn-sidebar-whatsapp {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                padding: 0.85rem 1.5rem;
                font-family: var(--subtext);
                font-weight: 600;
                font-size: 0.85rem;
                letter-spacing: 0.05em;
                text-transform: uppercase;
                color: var(--text-light);
                background-color: #25d366; /* Standout green as in the crop */
                border: 1px solid #25d366;
                border-radius: 8px;
                transition: all 0.3s ease;
                text-decoration: none;
                
                svg {
                    width: 18px;
                    height: 18px;
                    margin-right: 8px;
                    fill: currentColor;
                }
                
                &:hover {
                    background-color: #20ba59;
                    border-color: #20ba59;
                    color: var(--text-light);
                    text-decoration: none;
                    transform: translateY(-2px);
                    box-shadow: 0 6px 15px rgba(37, 211, 102, 0.25);
                }
            }
            
            .btn-sidebar-phone {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                padding: 0.85rem 1.5rem;
                font-family: var(--subtext);
                font-weight: 600;
                font-size: 0.85rem;
                letter-spacing: 0.05em;
                text-transform: uppercase;
                color: var(--text-dark);
                background-color: transparent;
                border: 1px solid rgba(24, 33, 39, 0.15);
                border-radius: 8px;
                transition: all 0.3s ease;
                text-decoration: none;
                
                svg {
                    width: 18px;
                    height: 18px;
                    margin-right: 8px;
                    color: var(--text-muted-dark);
                    transition: color 0.3s ease;
                }
                
                &:hover {
                    border-color: var(--text-dark);
                    background-color: rgba(24, 33, 39, 0.02);
                    text-decoration: none;
                    transform: translateY(-2px);
                    
                    svg {
                        color: var(--text-dark);
                    }
                }
            }
        }
    }
}

/* Responsive Overrides */
@media (min-width: 768px) {
    .villas-main-container {
        flex-direction: row;
        justify-content: space-between;
        gap: 4%;
    }
    
    .villa-detail-content {
        width: 68%;
        
        .villa-main-title {
            font-size: 2.8rem;
        }
        
        .villa-price {
            font-size: 2.2rem;
        }
    }
    
    .villa-sidebar {
        width: 28%;
        position: sticky;
        top: 120px;
        align-self: flex-start;
    }
}

</style>

<!-- Villas Main Content Layout -->
<section id="villas-layout">
	<div class="container-global">
		<div class="content villas-main-container">
			
			<!-- Left: Details Column -->
			<div class="villa-detail-content">
				<!-- Main Single Villa Image -->
				<div class="villa-image-wrapper">
					<img src="<?= $data->result->img_cover_url  ?>" alt="<?= $data->result->title ?>" />
				</div>
				
				<!-- Description -->
				<div class="villa-description mt-5">
					<h3 class="desc-title">Description</h3>
					<?= $data->result->content ?>
				</div>
			</div>
			
			<!-- Right: Sticky Sidebar Column -->
			<aside class="villa-sidebar">
				<div class="villa-sidebar-widget">
					<h4 class="widget-promo-title">Create Your Future Home in West Bali</h4>
					<p class="widget-promo-text">
						Build a private villa surrounded by greenery, peaceful village landscapes, and the natural character of Selemadeg Barat.
					</p>
					
					<!-- CONTACT 1: Angga Kusuma Wijaya -->
					<div class="agent-info-card">
						<div class="agent-avatar">AK</div>
						<div class="agent-details">
							<span class="agent-name">Angga Kusuma Wijaya</span>
							<span class="agent-label">Developer & Founder</span>
						</div>
					</div>
					
					<div class="sidebar-actions mb-4">
						<!-- WhatsApp -->
						<a href="<?= $func->dm_whatsapp() ?>" class="btn-sidebar-whatsapp" target="_blank">
							<svg viewBox="0 0 16 16">
								<path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.618-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.09-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.048.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
							</svg>
							WhatsApp Angga
						</a>
						<!-- Phone -->
						<a href="tel:<?= $data->company->company_phone ?>" class="btn-sidebar-phone">
							<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
								<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
							</svg>
							Call Angga
						</a>
					</div>
					
					<!-- CONTACT 2: Imelda Sari Chandra -->
					<div class="agent-info-card">
						<div class="agent-avatar">IC</div>
						<div class="agent-details">
							<span class="agent-name">Imelda Sari Chandra</span>
							<span class="agent-label">Sales Partner</span>
						</div>
					</div>
					
					<div class="sidebar-actions">
						<!-- WhatsApp -->
						<a href="https://wa.me/6282366333535" class="btn-sidebar-whatsapp" target="_blank">
							<svg viewBox="0 0 16 16">
								<path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.618-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.09-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.048.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
							</svg>
							WhatsApp Imelda
						</a>
						<!-- Phone -->
						<a href="tel:+6282366333535" class="btn-sidebar-phone">
							<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
								<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
							</svg>
							Call Imelda
						</a>
					</div>
				</div>
			</aside>
			
		</div>
	</div>
</section>



<?php $func->sidebar('gallery'); ?>


<?php $func->load('home/home_why') ?>