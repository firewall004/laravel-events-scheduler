<template>
    <div class="container">
		<full-calendar :events="userAllEvents" locale="en"></full-calendar>
    </div>
</template>

<script>
	import axios from 'axios'

	export default {
        data () {
			return {
				scheduledEvents: []
			}
		},
		props: {
			userId: {
				type: String,
				default: function() {
					return window.userId;
				},
			},
		},
		async mounted() {
			await this.loadCalendarSchedules()
		},
		methods: {
            async loadCalendarSchedules() {
                await axios.get('/api/events/user/2/schedules')
                     .then((response) => {
                       this.scheduledEvents = response.data;
                     });
            },

        },
		computed: {
			userAllEvents() {
				if (this.scheduledEvents.length === 0) {
					return [];
				}
				const allScheduledEvents = this.scheduledEvents.data;

				let allEvents = [];
				allScheduledEvents.forEach(eventSchedules => {
					let event = eventSchedules.event;
					let schedules = eventSchedules.schedules;

					schedules.forEach(schedule => {
						let eachEvent = {
							'title': event.name,
							'start': schedule.scheduled_date,
							'end': schedule.scheduled_date,
							'YOUR_DATA': {
								'time_from': event.start_time,
								'time_to': event.end_time
							},
						};

						allEvents.push(eachEvent);
					});
				});

				return allEvents;
			}
		},
    }
</script>
